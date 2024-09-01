function updateDateTime() {
    const now = new Date();
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    document.getElementById('day').textContent = days[now.getDay()];
    document.getElementById('date').textContent = now.getDate().toString().padStart(2, '0');
    document.getElementById('month').textContent = (now.getMonth() + 1).toString().padStart(2, '0');
    document.getElementById('year').textContent = now.getFullYear();
    document.getElementById('hours').textContent = now.getHours().toString().padStart(2, '0');
    document.getElementById('minutes').textContent = now.getMinutes().toString().padStart(2, '0');
    document.getElementById('seconds').textContent = now.getSeconds().toString().padStart(2, '0');
}

setInterval(updateDateTime, 1000);
updateDateTime();
