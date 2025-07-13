function handleIncomeTypeChange(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const incomeTypeId = selectedOption.value;
    const incomeTypeName = selectedOption.dataset.name;

    //console.log('Selected ID:', incomeTypeId);
    //console.log('Selected Income Type:', incomeTypeName);

    document.getElementById('selectedIncomeIdInCreateIncome').value = incomeTypeId;
    document.getElementById('selectedIncomeNameInCreateIncome').value = incomeTypeName;
}
