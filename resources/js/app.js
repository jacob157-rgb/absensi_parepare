import { Alpine } from "alpinejs";
import "./bootstrap";
import "preline";
import { data } from "./init-alpine";
import { Html5QrcodeScanner } from "html5-qrcode";

document.getElementById("openCameraBtn").addEventListener("click", function () {
    // Request camera access
    navigator.mediaDevices
        .getUserMedia({ video: true })
        .then(function (stream) {
            // Camera access granted, show the modal and initialize the QR code scanner
            document.getElementById("readerModal").classList.add("flex");
            document.getElementById("readerModal").classList.remove("hidden");

            // Open the camera
            var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
                fps: 10,
                qrbox: 250,
            });

            function onScanSuccess(decodedText, decodedResult) {

                console.log(`Scan result: ${decodedText}`, decodedResult);

                const qrData = JSON.parse(decodedText);
                
                // siswa scan qr sekolah
                if(qrData.code_unique) {
                    document.getElementById('codeUnique').value = qrData.code_unique;
                    document.getElementById('guruId').value = qrData.guru_id;
                    document.getElementById('absenForm').submit();
                }else {
                    // guru scan qr siswa
                    document.getElementById('nik_siswa').value = decodedText;
                    document.getElementById('absenForm').submit();
                }

                html5QrcodeScanner.clear();
                stream.getTracks().forEach((track) => track.stop()); // Stop the camera stream
                document.getElementById("readerModal").classList.add("hidden");
                document.getElementById("readerModal").classList.remove("flex");
            }

            html5QrcodeScanner.render(onScanSuccess);

            // Close the modal and stop the camera when "Close" is clicked
            document
                .getElementById("closeReader")
                .addEventListener("click", function () {
                    html5QrcodeScanner.clear();
                    stream.getTracks().forEach((track) => track.stop()); // Stop the camera stream

                    // Hide the modal
                    document
                        .getElementById("readerModal")
                        .classList.add("hidden");
                    document
                        .getElementById("readerModal")
                        .classList.remove("flex");
                });
        })
        .catch(function (err) {
            // Camera access denied, close the modal
            alert("Camera access is required to scan the QR code.");
            document.getElementById("readerModal").classList.add("hidden");
            document.getElementById("readerModal").classList.remove("flex");
        });
});

window.Alpine = Alpine;

window.data = data;

Alpine.start();
