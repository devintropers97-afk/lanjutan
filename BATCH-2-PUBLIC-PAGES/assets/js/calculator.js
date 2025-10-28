/**
 * Price Calculator JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.service-checkbox-input');
    const totalSetupElement = document.getElementById('totalSetup');
    const totalMonthlyElement = document.getElementById('totalMonthly');
    const selectedServicesElement = document.getElementById('selectedServices');
    
    function calculateTotal() {
        let totalSetup = 0;
        let totalMonthly = 0;
        let selectedServices = [];
        
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const setupPrice = parseInt(checkbox.getAttribute('data-setup')) || 0;
                const monthlyPrice = parseInt(checkbox.getAttribute('data-monthly')) || 0;
                const serviceName = checkbox.getAttribute('data-name');
                
                totalSetup += setupPrice;
                totalMonthly += monthlyPrice;
                selectedServices.push(serviceName);
            }
        });
        
        // Update totals
        if (totalSetupElement) {
            totalSetupElement.textContent = formatRupiah(totalSetup);
        }
        
        if (totalMonthlyElement) {
            totalMonthlyElement.textContent = formatRupiah(totalMonthly);
        }
        
        // Update selected services list
        if (selectedServicesElement) {
            if (selectedServices.length > 0) {
                selectedServicesElement.innerHTML = selectedServices.map(service => 
                    '<li><i class="bi bi-check-circle-fill"></i> ' + service + '</li>'
                ).join('');
            } else {
                selectedServicesElement.innerHTML = '<li class="text-muted">Belum ada layanan dipilih</li>';
            }
        }
    }
    
    // Add event listeners
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', calculateTotal);
    });
    
    // Initial calculation
    calculateTotal();
    
    // Order button functionality
    const orderBtn = document.getElementById('orderCalculatedServices');
    if (orderBtn) {
        orderBtn.addEventListener('click', function() {
            const selectedServices = [];
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedServices.push(checkbox.getAttribute('data-name'));
                }
            });
            
            if (selectedServices.length === 0) {
                alert('Silakan pilih minimal 1 layanan');
                return;
            }
            
            const totalSetup = totalSetupElement.textContent;
            const totalMonthly = totalMonthlyElement.textContent;
            
            const message = '*PERHITUNGAN DARI WEBSITE*\n\n' +
                'Layanan yang dipilih:\n' +
                selectedServices.map((s, i) => (i + 1) + '. ' + s).join('\n') +
                '\n\nTotal Setup: ' + totalSetup +
                '\nTotal Bulanan: ' + totalMonthly +
                '\n\nSaya ingin konsultasi lebih lanjut.';
            
            const whatsappUrl = 'https://wa.me/6283173868915?text=' + encodeURIComponent(message);
            window.open(whatsappUrl, '_blank');
        });
    }
});

// Format rupiah helper
function formatRupiah(angka) {
    if (angka === 0) return 'Rp 0';
    const formatted = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(angka);
    return formatted;
}
