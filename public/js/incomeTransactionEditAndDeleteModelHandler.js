function openIncomeTransactionEditModal(button){
    document.getElementById('incomeTypeIdHeaderForEditIncome').textContent = button.getAttribute('data-transaction-id');
    document.getElementById('incomeTypeHeaderForEditIncome').textContent = button.getAttribute('data-income-type');
    document.getElementById('incomeTransactionValue').value = button.getAttribute('data-income-value');
    document.getElementById('incomeTransactionMonth').value = button.getAttribute('data-transaction-month');
    document.getElementById('incomeTransactionSpecialNote').value = button.getAttribute('data-special-note');
    document.getElementById('incomeType').value = button.getAttribute('data-income-type');
    document.getElementById('incomeTransactionId').value = button.getAttribute('data-transaction-id');
}

function openIncomeTransactionDeleteModal(button)
{
    document.getElementById('incomeTransactionTypeForText').textContent = button.getAttribute('data-income-type');
    document.getElementById('incomeTransactionIdForText').textContent = button.getAttribute('data-transaction-id');
    document.getElementById('incomeTransactionIdForDelete').value = button.getAttribute('data-transaction-id');
}


