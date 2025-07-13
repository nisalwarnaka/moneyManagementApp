<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add New Expense Type') }}
        </h2>
    </header>
    <div class="grid md:grid-cols-2 md:gap-6">

        <div class="relative overflow-x-auto z-0 w-full mb-5 group max-h-60 ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-900 dark:text-gray-900">
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
                        Income Type Id
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($allExpenseData as $allExpenseTypeData)
                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                            {{$allExpenseTypeData->expense_type}}
                        </th>
                        <td class="px-6 py-4">
                            {{$allExpenseTypeData->max_amount}}
                        </td>
                        <td class="px-6 py-4">
                            {{$allExpenseTypeData->min_amount}}
                        </td>
                        <td class="px-6 py-4">
                            {{$allExpenseTypeData->id}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="relative z-0 w-full mb-5 group">

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add your new income type, give the new name and other details correctly. If you want to change the income type after adding, you have access to do so.') }}
            </p>
            <br>

            <form action="{{Route('expenseType.create')}}" method="post">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="expenseType" id="expenseType" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expense Type</label>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="maxAmountForExpenseType" id="maxAmountForExpenseType" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="maxAmountForExpenseType" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max Amount</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="minAmountForExpenseType" id="minAmountForExpenseType" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="minAmountForExpenseType" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min Amount</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Expense Type</button>
            </form>

        </div>
    </div>


</section>

