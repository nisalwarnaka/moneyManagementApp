function openEditModal(button){
    document.getElementById('incomeTypeIdHeader').textContent = button.getAttribute('data-id');
    document.getElementById('incomeTypeNameHeader').textContent = button.getAttribute('data-income_type');
    document.getElementById('incomeTypeModel').value = button.getAttribute('data-income_type');
    document.getElementById('maxAmount').value = button.getAttribute('data-max_amount');
    document.getElementById('minAmount').value = button.getAttribute('data-min_amount');
    document.getElementById('incomeId').value = button.getAttribute('data-id');
}

function openDeleteModal(button)
{
    document.getElementById('incomeTypeShowInHeader').textContent = button.getAttribute('data-income_type');
    document.getElementById('incomeIdShowInHeader').textContent = button.getAttribute('data-id');
    document.getElementById('incomeIdDelete').value = button.getAttribute('data-id');
}


