function handleExpenseTypeChange(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const expenseTypeId = selectedOption.value;
    const expenseTypeName = selectedOption.dataset.name;

    //console.log('Selected ID:', incomeTypeId);
    //console.log('Selected Income Type:', incomeTypeName);

    document.getElementById('ExpenseTypeIdForAddNewExpense').value = expenseTypeId;
    document.getElementById('ExpenseTypeForAddNewExpense').value = expenseTypeName;
}
