function openExpenseTransactionEditModal(button){
    document.getElementById('ExpenseTransactionIdForEditeModelText').textContent = button.getAttribute('data-expense-transaction-id');
    document.getElementById('ExpenseTypeForEditeModelText').textContent = button.getAttribute('data-expense-type');
    document.getElementById('ExpenseValueForEditModel').value = button.getAttribute('data-expense-value');
    document.getElementById('ExpenseMonthForEditModel').value = button.getAttribute('data-expense-transaction-month');
    document.getElementById('ExpenseSpecialNoteForEditModel').value = button.getAttribute('data-expense-special-note');
    document.getElementById('ExpenseTransactionIdForEditModel').value = button.getAttribute('data-expense-transaction-id');

}

function openExpenseTransactionDeleteModal(button)
{
    document.getElementById('ExpenseTypeForModelDeleteText').textContent = button.getAttribute('data-expense-type');
    document.getElementById('ExpenseTransactionIdForModelDeleteText').textContent = button.getAttribute('data-expense-transaction-id');
    document.getElementById('ExpenseTransactionIdForModelDelete').value = button.getAttribute('data-expense-transaction-id');
}


