import { Alpine } from "alpinejs";
import "./bootstrap";
import "preline";
import { data } from "./init-alpine";
import { Html5QrcodeScanner, Html5Qrcode } from "html5-qrcode";

document.getElementById("openCameraBtn").addEventListener("click", function () {
    navigator.mediaDevices.enumerateDevices().then((devices) => {
        const videoDevices = devices.filter((device) => device.kind === "videoinput");
        const cameraSelect = document.getElementById("cameraSelect");

        // Clear any previous options
        cameraSelect.innerHTML = "";

        // Populate the camera dropdown
        videoDevices.forEach((device, index) => {
            const option = document.createElement("option");
            option.value = device.deviceId;
            option.text = device.label || `Camera ${index + 1}`;
            cameraSelect.appendChild(option);
        });

        // Default to the first camera
        cameraSelect.selectedIndex = 0;

        // Show modal
        document.getElementById("readerModal").classList.add("flex");
        document.getElementById("readerModal").classList.remove("hidden");

        let html5QrCode = new Html5Qrcode("reader");

        // Function to start scanning
        function startScanning(cameraId) {
            html5QrCode
                .start(
                    cameraId,
                    {
                        fps: 10,
                        qrbox: 250,
                    },
                    (decodedText, decodedResult) => {
                        console.log(`Scan result: ${decodedText}`, decodedResult);

                        const qrData = JSON.parse(decodedText);

                        if (qrData.code_unique) {
                            document.getElementById("codeUnique").value = qrData.code_unique;
                            document.getElementById("guruId").value = qrData.guru_id;
                            document.getElementById("absenForm").submit();
                        } else {
                            document.getElementById("nik_siswa").value = decodedText;
                            document.getElementById("absenForm").submit();
                        }

                        html5QrCode.stop();
                        document.getElementById("readerModal").classList.add("hidden");
                        document.getElementById("readerModal").classList.remove("flex");
                    },
                    (errorMessage) => {
                        // console.error(`QR Code scan error: ${errorMessage}`);
                    }
                )
                .catch((err) => {
                    console.error(`Unable to start scanning: ${err}`);
                });
        }

        // Start scanning when the button is clicked
        document.getElementById("startScanningBtn").addEventListener("click", function () {
            startScanning(cameraSelect.value);
        });

        // Listen for camera selection change
        cameraSelect.addEventListener("change", function () {
            html5QrCode.stop().then(() => {
                startScanning(cameraSelect.value);
            });
        });

        // Close the modal and stop the camera when "Close" is clicked
        document.getElementById("closeReader").addEventListener("click", function () {
            html5QrCode.stop().then(() => {
                document.getElementById("readerModal").classList.add("hidden");
                document.getElementById("readerModal").classList.remove("flex");
            });
        });
    }).catch(function (err) {
        alert("Unable to access the camera devices. Camera access is required to scan the QR code.");
    });
});


window.Alpine = Alpine;
window.data = data;
Alpine.start();
