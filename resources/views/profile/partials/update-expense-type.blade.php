<section class="space-y-6">

    <div class="md:gap-6 ">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-200 dark:text-gray-900">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Expense Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Max Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Min Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expense Type Id
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
                @foreach($allExpenseData as $allExpenseTypes)
                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                            {{$allExpenseTypes->expense_type}}
                        </th>
                        <td class="px-6 py-4 text-gray-900">
                            {{$allExpenseTypes->max_amount}}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            {{$allExpenseTypes->min_amount}}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            {{$allExpenseTypes->id}}
                        </td>
                        <td class="px-6 py-4">
                            <button data-id="{{$allExpenseTypes->id }}"
                                    data-income_type="{{ $allExpenseTypes->expense_type }}"
                                    data-max_amount="{{ $allExpenseTypes->max_amount }}"
                                    data-min_amount="{{ $allExpenseTypes->min_amount }}"
                                    data-modal-target="ExpenseTypeEditModel" data-modal-toggle="ExpenseTypeEditModel" onclick="openExpenseTypeEditModal(this)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                        </td>
                        <td class="px-6 py-4">
                            <button data-id="{{$allExpenseTypes->id }}"
                                    data-income_type="{{ $allExpenseTypes->expense_type }}" data-modal-target="ExpenseTypeDeleteModel" data-modal-toggle="ExpenseTypeDeleteModel" onclick="openExpenseTypeDeleteModal(this)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Main modal -->
            <div id="ExpenseTypeEditModel" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow-sm dark:bg-blue-100">
                        <!-- Modal header -->
                        <form action="{{Route('expenseType.update')}}" method="post">
                            @csrf
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 id="ExpenseTypeTextHeader" class="text-xl font-semibold dark:text-gray-900">

                                </h3>
                                <h3 class="text-xl font-semibold dark:text-blue-100">
                                    ----
                                </h3>
                                <h3 id="ExpenseTypeIdTextHeader" class="text-xl font-semibold dark:text-gray-900">

                                </h3>
                                <button type="button" class="text-gray-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ExpenseTypeEditModel">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="ExpenseTypeModel" id="ExpenseTypeModel" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-blue-400 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-blue-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expense Type</label>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="number" name="ExpenseMaxAmountModel" id="ExpenseMaxAmountModel" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-blue-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max Amount</label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="number" name="ExpenseMinAmountModel" id="ExpenseMinAmountModel" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-blue-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min Amount</label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="hidden" name="ExpenseTypeIdModel" id="ExpenseTypeIdModel" required />

                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="ExpenseTypeEditModel" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                <button data-modal-hide="ExpenseTypeEditModel" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cansel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <form action="{{Route('expenseType.delete')}}" method="post" onsubmit="return confirm('Are you sure? want to delete this income type !');">
                    @csrf
                    <div id="ExpenseTypeDeleteModel" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-red-500">
                                <button type="button" class="absolute top-3 end-2.5 text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ExpenseTypeDeleteModel">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-white">Are you sure you want to delete this<br><span id="ExpenseTypeDeleteModelText"></span><span class="dark:text-red-500"> -</span>: <span id="ExpenseTypeIdDeleteModelText"></span><br> Income Type ?</h3>

                                    <input type="hidden" name="ExpenseTypeIdDeleteModel" id="ExpenseTypeIdDeleteModel" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />

                                    <button data-modal-hide="ExpenseTypeDeleteModel" type="submit" class="text-white bg-red-700  dark:border-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Delete
                                    </button>
                                    <button data-modal-hide="ExpenseTypeDeleteModel" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-white dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

        </div>
    </div>
    <script src="{{ asset('js/expenseTypeEditAndDeleteModelHandler.js') }}"></script>
</section>
