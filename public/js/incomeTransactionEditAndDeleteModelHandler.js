function openIncomeTransactionEditModal(button){
    document.getElementById('incomeTypeIdHeaderForEditIncome').textContent = button.getAttribute('data-transaction-id');
    document.getElementById('incomeTypeHeaderForEditIncome').textContent = button.getAttribute('data-income-type');
    document.getElementById('incomeTransactionValue').value = button.getAttribute('data-income-value');
    document.getElementById('incomeTransactionMonth').value = button.getAttribute('data-transaction-month');
    document.getElementById('incomeTransactionSpecialNote').value = button.getAttribute('data-special-note');
    document.getElementById('incomeType').value = button.getAttribute('data-income-type');
    document.getElementById('incomeTransactionId').value = button.getAttribute('data-transaction-id');
}

function openDeleteModal(button)
{
    document.getElementById('incomeTypeShowInHeader').textContent = button.getAttribute('data-income_type');
    document.getElementById('incomeIdShowInHeader').textContent = button.getAttribute('data-id');
    document.getElementById('incomeIdDelete').value = button.getAttribute('data-id');
}


