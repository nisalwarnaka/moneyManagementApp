function openExpenseTypeEditModal(button){
    document.getElementById('ExpenseTypeIdTextHeader').textContent = button.getAttribute('data-id');
    document.getElementById('ExpenseTypeTextHeader').textContent = button.getAttribute('data-income_type');
    document.getElementById('ExpenseTypeModel').value = button.getAttribute('data-income_type');
    document.getElementById('ExpenseMaxAmountModel').value = button.getAttribute('data-max_amount');
    document.getElementById('ExpenseMinAmountModel').value = button.getAttribute('data-min_amount');
    document.getElementById('ExpenseTypeIdModel').value = button.getAttribute('data-id');
}

function openDeleteModal(button)
{
    document.getElementById('incomeTypeShowInHeader').textContent = button.getAttribute('data-income_type');
    document.getElementById('incomeIdShowInHeader').textContent = button.getAttribute('data-id');
    document.getElementById('incomeIdDelete').value = button.getAttribute('data-id');
}


