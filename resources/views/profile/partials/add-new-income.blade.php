<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add New Income') }}
        </h2>
    </header>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add your new income, give the value, month and other details correctly. is there spacial notes you can add it in special note area. If you want to change the income detail after adding, you have access to do so.') }}
            </p>
            <br>

            <form action="" method="post">
                @csrf

               <div class="relative z-0 w-full mb-5 group">
                   <select name="" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >

                       <option value="" >Income Type</option>
                       <option value="saab">Saab</option>
                   </select>
               </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Income Value</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <select name="" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >

                            <option value="" >Month</option>
                            <option value="saab">January</option>
                            <option value="saab">February</option>
                            <option value="saab">March</option>
                            <option value="saab">April</option>
                            <option value="saab">May</option>
                            <option value="saab">June</option>
                            <option value="saab">July</option>
                            <option value="saab">August</option>
                            <option value="saab">September</option>
                            <option value="saab">November</option>
                            <option value="saab">December</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Income</button>
            </form>

        </div>

        <div class="relative overflow-x-auto z-0 w-full mb-5 group max-h-60 ">


            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:gray-900">Special note</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500 h-40" placeholder=""></textarea>


        </div>
    </div>


</section>
