<section class="space-y-6">

    <div class="md:gap-6 ">

        <form action="{{Route('income.find')}}" method="post">
            @csrf
        <div class="grid md:grid-cols-4 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <select name="incomeTypeForFind" id="incomeTypeForFind" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >

                    <option value="" >Income Type</option>
                    @foreach($allIncomeData as $allIncomeTypes)
                        <option value="{{$allIncomeTypes->id}}" data-name ="{{$allIncomeTypes->income_type}}">{{$allIncomeTypes->income_type}}</option>
                    @endforeach

                </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select name="transactionMonthForFind" id="transactionMonthForFind" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >

                    <option value="" >Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="transactionDateForFind" id="transactionDateForFind" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="transactionDateForFind" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Income Value</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Find Transactions</button>
            </div>
        </div>
        </form>
        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-200 dark:text-gray-900">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Income type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Value
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Special note
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Month
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date & time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Trans id
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
                @if($results->count())

                    @foreach($results as $filteredResult)
                        <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                                {{$filteredResult->income_type}}
                            </th>
                            <td class="px-6 py-4 text-gray-900">
                                {{$filteredResult->income_value}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$filteredResult->special_note}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$filteredResult->month}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$filteredResult->created_at->format('M j, Y')}}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{$filteredResult->id}}
                            </td>
                            <td class="px-6 py-4">
                                <button data-transaction-id="{{$filteredResult->id}}"
                                        data-income-type="{{$filteredResult->income_type}}"
                                        data-income-value="{{$filteredResult->income_value}}"
                                        data-transaction-month="{{$filteredResult->month}}"
                                        data-special-note="{{$filteredResult->special_note}}" data-modal-target="IncomeEditModel" data-modal-toggle="IncomeEditModel" onclick="openIncomeTransactionEditModal(this)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button >
                            </td>
                            <td class="px-6 py-4">
                                <button data-transaction-id="{{$filteredResult->id}}"
                                        data-income-type="{{$filteredResult->income_type}}" data-modal-target="IncomeTransactionDeleteModel" data-modal-toggle="IncomeTransactionDeleteModel" onclick="openIncomeTransactionDeleteModal(this)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                            </td>


                        </tr>
                    @endforeach

                @endif
                </tbody>
            </table>

            <!-- Main modal -->
            <div id="IncomeEditModel" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow-sm dark:bg-blue-100">
                        <!-- Modal header -->
                        <form action="{{Route('incomeTransactionUpdate.update')}}" method="post">
                            @csrf
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 id="incomeTypeHeaderForEditIncome" class="text-xl font-semibold dark:text-gray-900">

                                </h3>
                                <h3 class="text-xl font-semibold dark:text-blue-100">
                                    ----
                                </h3>
                                <h3 id="incomeTypeIdHeaderForEditIncome" class="text-xl font-semibold dark:text-gray-900">

                                </h3>
                                <button type="button" class="text-gray-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="IncomeEditModel">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">

                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="number" name="incomeTransactionValue" id="incomeTransactionValue" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                        <label for="incomeTransactionValue" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-blue-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Transaction Value</label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <select name="incomeTransactionMonth" id="incomeTransactionMonth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >

                                            <option value="" >Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <textarea id="incomeTransactionSpecialNote" name="incomeTransactionSpecialNote" rows="4" class="block p-2.5 w-full text-sm rounded-lg border  focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-900 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Special Note"></textarea>
                                    <input type="hidden" id="incomeType" name="incomeType" >
                                    <input type="hidden" id="incomeTransactionId" name="incomeTransactionId">

                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="IncomeEditModel" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                <button data-modal-hide="IncomeEditModel" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cansel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @foreach($allIncomeData as $allIncomeTypes)
                <form action="{{Route('incomeTransactionDelete.delete')}}" method="post" onsubmit="return confirm('Are you sure? want to delete this income transaction !');">
                    @csrf
                    <div id="IncomeTransactionDeleteModel" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-red-500">
                                <button type="button" class="absolute top-3 end-2.5 text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="IncomeTransactionDeleteModel">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-white">Are you sure you want to delete this<br><span id="incomeTransactionTypeForText"></span><span class="dark:text-red-500"> -</span>: <span id="incomeTransactionIdForText"></span><br> Income Type ?</h3>

                                    <input type="hidden" name="incomeTransactionIdForDelete" id="incomeTransactionIdForDelete" required />

                                    <button data-modal-hide="IncomeTransactionDeleteModel" type="submit" class="text-white bg-red-700  dark:border-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Delete
                                    </button>
                                    <button data-modal-hide="IncomeTransactionDeleteModel" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-white dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach

        </div>
    </div>
    <script src="{{ asset('js/incomeTransactionEditAndDeleteModelHandler.js') }}"></script>
</section>
