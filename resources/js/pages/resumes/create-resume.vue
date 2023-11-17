<script setup>
import axios from 'axios';
import { reactive, onMounted, ref } from 'vue';
import Tesseract from 'tesseract.js';

const form = reactive({
    fullName: '',
    fatherName: '',
    Dob: '',
    address: '',
    address2: '',
    passportNumber: '',
});


const performOCR = async () => {
    try {
        const englishText = await Tesseract.recognize('/assets/images/img-3.jpg', 'eng', {
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
        form.address = address;
        form.address2 = address2;

        form.passportNumber = passportNumber;
        // form.description = data.description;

        console.log('Data:', textData);
        console.log('Full Name:', fullName);
        console.log('Father Name:', fatherName);
        console.log('Date of birth:', Dob);
        console.log('Address:', address);
        console.log('Passport No.:', passportNumber);
    } catch (error) {
        console.error('Error performing OCR:', error);
    }
};

onMounted(() => {
    performOCR();
});
</script>
<template >
    <div class="content bg-white m-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create CV</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Cv</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h1>Upload Pic
            </h1>

            <form>
                <div class="form-group col-md-6 custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Full Name</label>
                        <input v-model="form.fullName" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Father's Name</label>
                        <input v-model="form.fatherName" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Address</label>
                        <input v-model="form.address" type="text" class="form-control" id="inputAddress"
                            placeholder="1234 Main St">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">District</label>
                        <input v-model="form.address2" type="text" class="form-control"
                            placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Date of Birth</label>
                        <input v-model="form.Dob" type="text" class="form-control" placeholder="1234 Main St">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Passport Number</label>
                        <input v-model="form.passportNumber" type="text" class="form-control" placeholder="Passport Number">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</template>