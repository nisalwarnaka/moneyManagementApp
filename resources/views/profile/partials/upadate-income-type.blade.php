<section class="space-y-6">

    <div class="md:gap-6 ">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-200 dark:text-gray-900">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($allIncomeData as $allIncomeTypes)
                <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                        {{$allIncomeTypes->income_type}}
                    </th>
                    <td class="px-6 py-4 text-gray-900">
                        {{$allIncomeTypes->max_amount}}
                    </td>
                    <td class="px-6 py-4 text-gray-900">
                        {{$allIncomeTypes->min_amount}}
                    </td>
                    <td class="px-6 py-4 text-gray-900">
                        {{$allIncomeTypes->id}}
                    </td>
                    <td class="px-6 py-4">
                        <button data-id="{{$allIncomeTypes->id }}"
                                data-income_type="{{ $allIncomeTypes->income_type }}"
                                data-max_amount="{{ $allIncomeTypes->max_amount }}"
                                data-min_amount="{{ $allIncomeTypes->min_amount }}"
                                data-modal-target="IncomeTypeEditModel" data-modal-toggle="IncomeTypeEditModel" onclick="openEditModal(this)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                    </td>
                    <td class="px-6 py-4">
                        <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                    </td>


                </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Main modal -->
            <div id="IncomeTypeEditModel" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow-sm dark:bg-blue-100">
                        <!-- Modal header -->
                        <form action="{{Route('incomeType.update')}}" method="post">
                            @csrf
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 id="incomeTypeNameHeader" class="text-xl font-semibold dark:text-gray-900">

                            </h3>
                            <h3 class="text-xl font-semibold dark:text-blue-100">
                                 ----
                            </h3>
                            <h3 id="incomeTypeIdHeader" class="text-xl font-semibold dark:text-gray-900">

                            </h3>
                            <button type="button" class="text-gray-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="IncomeTypeEditModel">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="incomeType" id="incomeType" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-400 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="income-type" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-blue-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Income Type</label>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="maxAmount" id="maxAmount" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="max-amount" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-blue-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max Amount</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="minAmount" id="minAmount" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="min-amount" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-blue-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min Amount</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="hidden" name="incomeId" id="incomeId" required />

                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="IncomeTypeEditModel" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                            <button data-modal-hide="IncomeTypeEditModel" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cansel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>

        function openEditModal(button){
            document.getElementById('incomeTypeIdHeader').textContent = button.getAttribute('data-id');
            document.getElementById('incomeTypeNameHeader').textContent = button.getAttribute('data-income_type');
            document.getElementById('incomeType').value = button.getAttribute('data-income_type');
            document.getElementById('maxAmount').value = button.getAttribute('data-max_amount');
            document.getElementById('minAmount').value = button.getAttribute('data-min_amount');
            document.getElementById('incomeId').value = button.getAttribute('data-id');
        }

    </script>
</section>
