<script setup>
import axios from 'axios';
import { reactive, onMounted, ref } from 'vue';
import Tesseract from 'tesseract.js';
import { useRouter, useRoute } from 'vue-router';
import { useToastr } from '../../toaster';
const zoomed = ref(false);
const file = ref();
const pictureUrl = ref(null);
const image_magnifier = ref(null);
const editMode = ref(false);
const ppImageUrl = ref(null);
const ppfile = ref();
const router = useRouter();
const route = useRoute();
const toastr = useToastr();
const imageStatus = ref(false);

const form = reactive({
    fullName: '',
    fatherName: '',
    Dob: '',
    ward: '',
    district: '',
    passportNumber: '',
    issuedAt: '',
    expiredAt: '',
    workedAs: '',
    workedAt: '',
    experience: '',
    pp_image: null,
});
const performOCR = async (imageUrl) => {
    try {
        const englishText = await Tesseract.recognize(imageUrl, 'eng', {
        });

        let fullName = '';
        let fatherName = '';
        let Dob = '';
        let address = '';
        let address2 = '';
        let passportNumber = '';
        let textData = englishText.data.text.split('\n'); // Split text into lines
        let fullNameFound = false;
        let fatherNameFound = false;
        let dobFound = false;
        let addressFound = false;

        let passportNumberFound = false;

        for (let i = 0; i < textData.length; i++) {
            const line = textData[i];

            if (fullNameFound && fatherNameFound && addressFound && dobFound && passportNumberFound) {
                break; // Stop capturing lines after finding the name
            }

            if (line.includes('Full Name :')) {
                fullNameFound = true;
                const parts = line.split(':');
                fullName = parts.slice(1).join(':').trim().match(/[a-zA-Z '']+/g).join('');
            }
            if (line.includes('Father Name :')) {
                fatherNameFound = true;
                const fatherPart = line.split(':');
                fatherName = fatherPart.slice(1).join(':').trim().match(/[a-zA-Z '']+/g).join('');
            }
            if (line.includes('Date of birth :')) {
                dobFound = true;
                const dobPart = line.split(':')[1]; // Take the part after ':'
                Dob = dobPart.split(' ').slice(1, 4).join(' ').trim().match(/[a-zA-Z ',' '' 0-9]+/g).join(''); // Take only the first 3 elements
                // Now, dobElements will contain the first three elements after 'Date of birth:'
            }
            if (line.includes('Address :')) {
                addressFound = true;
                const addressPart = line.split(':');
                const addressWords = addressPart.slice(1).join(':').trim().split(',')[0].trim();
                address = addressWords.match(/[a-zA-Z,' 0-9]+/g).join('');

                const firstCommaIndex = line.indexOf(',');
                const secondCommaIndex = line.indexOf(',', firstCommaIndex + 1);

                if (firstCommaIndex !== -1 && secondCommaIndex !== -1) {
                    const startIndex = firstCommaIndex + 1;
                    const endIndex = secondCommaIndex;
                    const address2Words = line.substring(startIndex, endIndex).trim();
                    address2 = address2Words.match(/[a-zA-Z,' 0-9]+/g).join('');
                    // Now, address2 will contain the text between the first and second comma in the address
                }
            }

            if (line.includes('Passport No :')) {
                passportNumberFound = true;
                const passportPart = line.split(':')[1]; // Take the part after ':'
                passportNumber = passportPart.split(' ')[1].trim().match(/[a-zA-Z0-9]+/g).join(''); // Take the first part before a space
            }
        }
        form.fullName = fullName;
        form.fatherName = fatherName;
        form.Dob = Dob;
        form.ward = address;
        form.district = address2;

        form.passportNumber = passportNumber;
        // form.description = data.description;

        console.log('Full Name:', fullName);
        console.log('Father Name:', fatherName);
        console.log('Date of birth:', Dob);
        console.log('Address:', address);
        console.log('Passport No.:', passportNumber);
    } catch (error) {
        console.error('Error performing OCR:', error);
    }
};

const imageUpload = (event) => {
    image_magnifier.value = document.getElementById('image_magnifier');
    // Hide the image magnifier initially
    if (image_magnifier.value) {
        image_magnifier.value.style.display = 'block';
    }
    file.value = event.target.files[0];
    pictureUrl.value = URL.createObjectURL(file.value);

    // Wait for the image to be loaded before performing OCR
    const img = new Image();
    img.onload = () => {
        performOCR(pictureUrl.value);
    };
    img.src = pictureUrl.value;
    console.log(pictureUrl.value);
    // Set the reference to the image magnifier element

};

const createResume = () => {
    const formData = new FormData(); // Create a FormData object to store the form data
    formData.append('fullName', form.fullName);
    formData.append('fatherName', form.fatherName);
    formData.append('ward', form.ward);
    formData.append('district', form.district);
    formData.append('passportNumber', form.passportNumber);
    formData.append('issuedAt', form.issuedAt);
    formData.append('expiredAt', form.expiredAt);
    formData.append('workedAs', form.workedAs);
    formData.append('experience', form.experience);
    formData.append('workedAt', form.workedAt);
    formData.append('pp_image', ppfile.value);
    axios.post('/api/resume/create', formData)
        .then((response) => {
            console.log(response);
            router.push('/admin/resume/show');
            toastr.success('Resume created successfully!');
        });

}
const editResume = () => {
    console.log(form);
    axios.put(`/api/resume/${route.params.id}/update`, form)
        .then((response) => {
            console.log(response);
            router.push(`/admin/resume/${route.params.id}/edit`);
            toastr.success('Resume edited successfully!');
        });
}

const handleSubmit = (value, actions) => {

    if (editMode.value == true) {
        editResume();
    }
    else {

        createResume();
    }
}

const ppSizeImage = (event) => {
    ppfile.value = event.target.files[0];
    imageStatus.value = true;
    ppImageUrl.value = URL.createObjectURL(ppfile.value);
}
const getResume = () => {
    axios.get(`/api/resume/${route.params.id}/edit`).then(({ data }) => {
        console.log(data);

        form.fullName = data.full_name;
        form.fatherName = data.father_name;
        form.Dob = data.dob;
        form.ward = data.ward;
        form.district = data.district;
        form.passportNumber = data.passport_number;
        form.issuedAt = data.issued_at;
        form.expiredAt = data.expiry_date;
        form.workedAs = data.worked_as;
        form.experience = data.years_of_experience;
        form.workedAt = data.worked_at;

        form.pp_image = imageStatus == true ? ppImageUrl.value : data.pp_size_image;
    })
}






onMounted(() => {
    if (route.name === 'admin.resume.edit') {
        editMode.value = true;
        getResume();
    }

});
const zoomLevel = ref(1); // Initial zoom level

const zoomIn = () => {
    zoomLevel.value += 0.1; // Increase zoom level on click
};

// Zoom functionality for the image
const handleZoom = (event) => {
    const magnifyingArea = document.getElementById('magnifying_area');
    const magnifyingImg = document.getElementById('magnifying_img');

    const magnifyFactor = 0.1; // Adjust the magnification sensitivity

    const offsetX = event.offsetX;
    const offsetY = event.offsetY;

    const percentageX = (offsetX / magnifyingArea.offsetWidth) * 100;
    const percentageY = (offsetY / magnifyingArea.offsetHeight) * 100;

    magnifyingImg.style.transformOrigin = `${percentageX}% ${percentageY}%`;
    magnifyingImg.style.transform = `scale(${zoomLevel.value})`;
};

const resetZoom = () => {
    zoomLevel.value = 1; // Reset zoom level on mouse leave
};
const zoomOut = () => {
    zoomLevel.value = 1; // Reset zoom level on mouse leave

}
</script>
   
<template >
    <div class="content bg-white m-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> <span v-if="editMode">Edit</span>
                            <span v-else>Create</span>
                            Resume
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
                                <span v-if="editMode">Edit</span>
                                <span v-else>Create</span>
                                <span>Cv</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <!-- Column for the form -->
                    <div class="col-md-6">
                        <label for="">Upload Image For Cv</label>
                        <div class="form-row">
                            <div class="form-group col-md-6 custom-file">
                                <input type="file" class="custom-file-input" @change="imageUpload">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <h2 class="mt-3">Detail Of Candidate</h2>
                        <form @submit.prevent="handleSubmit">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Full Name</label>
                                    <input v-model="form.fullName" type="text" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Father's Name</label>
                                    <input v-model="form.fatherName" type="text" class="form-control"
                                        placeholder="Father's Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputward">Ward </label>
                                    <input v-model="form.ward" type="text" class="form-control" id="inputAddress"
                                        placeholder="Ward">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">District</label>
                                    <input v-model="form.district" type="text" class="form-control" placeholder="District">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Date of Birth</label>
                                    <input v-model="form.Dob" type="text" class="form-control" placeholder="Date of Birth">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Passport Number</label>
                                    <input v-model="form.passportNumber" type="text" class="form-control"
                                        placeholder="Passport Number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Issued At</label>
                                    <input v-model="form.issuedAt" type="text" class="form-control"
                                        placeholder="Passport Issued Date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Expiry Date</label>
                                    <input v-model="form.expiredAt" type="text" class="form-control"
                                        placeholder="Passport Expiry Date">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Worked As</label>
                                    <input v-model="form.workedAs" type="text" class="form-control"
                                        placeholder="Where did you work?">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Years of Experience</label>
                                    <input v-model="form.experience" type="number" class="form-control"
                                        placeholder="How many years did you work there?">
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress">Worked At</label>
                                <input v-model="form.workedAt" type="text" class="form-control"
                                    placeholder="Name the company or workplace you were employed at.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Add Image (PP Size Photo)</label>
                                <br>

                                <!-- <img class="img-circle elevation-2 mb-2"
                                    style="max-height: 30%; max-width:30%; margin-left:20px;" alt="" :src="ppImageUrl"> -->
                                <img class="img-circle elevation-2 mb-2"
                                    style="max-height: 30%; max-width:30%; margin-left:20px;" alt=""
                                    :src="imageStatus == true ? ppImageUrl : form.pp_image">
                                <input type="file" class="form-control" @change="ppSizeImage">
                            </div>
                            <button type="submit" class="btn btn-primary">Make CV</button>
                        </form>
                    </div>
                    <!-- Column for the image -->
                    <div class="col-md-6" id="image_magnifier" style="display: none;">
                        <div class="zoom-controls">
                            <a class="zoom-icons" @click="zoomIn">
                                <i class="fa fa-plus"></i>
                            </a>
                            <a class="zoom-icons" @click="zoomOut">
                                <i class="fa fa-minus"></i>
                            </a>
                        </div>

                        <div class="image form-group" id="magnifying_area" @mousemove="handleZoom">
                            <img id="magnifying_img" class="img"
                                style="margin-left:20%;padding:10px; width: 80%; height: 80vh;" :src="pictureUrl"
                                :style="{ transform: `scale(${zoomLevel})` }" :class="{ 'zoomed': zoomLevel > 1 }">
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
</template>
<style>
*,
*:after,
*:before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
}

.zoomed #magnifying_img {
    max-width: none;
    max-height: none;
}

.zoomed #magnifying_area {
    overflow: hidden;
    /* Hide overflow on zoom */
}

.zoom-icons {
    position: relative;
    width: 40px;
    /* Adjust width and height as needed */
    height: 40px;
    /* Adjust width and height as needed */
    background-color: #ccc;
    /* Change the background color as desired */
    display: flex;
    justify-content: center;
    align-items: center;
}

.zoom-controls {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 10px;
    /* Optional: Add margin bottom to create space */
}

.zoom-icons i {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    flex-direction: column;
    z-index: 10;
}

.zoom-in-icon,
.zoom-out-icon {
    width: 30px;
    height: 30px;
    background-color: #ccc;
    margin-bottom: 5px;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.zoom-in-icon i,
.zoom-out-icon i {
    color: #000;
    font-size: 16px;
}
</style>