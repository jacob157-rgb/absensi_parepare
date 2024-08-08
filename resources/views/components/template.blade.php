@extends('layouts.admin')
@section('content')
    {{--  card count  --}}
    <section class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total clients
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    6389
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Account balance
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    $ 46,760.89
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    New sales
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    376
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Pending contacts
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    35
                </p>
            </div>
        </div>
    </section>

    {{--  tabel  --}}
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Client</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Hans Burger</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        10x Developer
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            $ 863.45
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Approved
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Jolina Angelie</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        Unemployed
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            $ 369.95
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                Pending
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Sarah Curry</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        Designer
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            $ 86.00
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Denied
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1546456073-6712f79251bb?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Wenzel Dashington</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        Actor
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            $ 863.45
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                Expired
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing 21-30 of 100
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <li>
                            <button
                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Previous">
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                1
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                2
                            </button>
                        </li>
                        <li>
                            <button
                                class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                3
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                4
                            </button>
                        </li>
                        <li>
                            <span class="px-3 py-1">...</span>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                8
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                9
                            </button>
                        </li>
                        <li>
                            <button
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Next">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </nav>
            </span>
        </div>
    </div>

    <!-- General elements -->
    <h4 class="mb-4 mt-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Elements
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe" />
        </label>

        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Account Type
            </span>
            <div class="mt-2">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="accountType" value="personal" />
                    <span class="ml-2">Personal</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="accountType" value="busines" />
                    <span class="ml-2">Business</span>
                </label>
            </div>
        </div>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Requested Limit
            </span>
            <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option>$1,000</option>
                <option>$5,000</option>
                <option>$10,000</option>
                <option>$25,000</option>
            </select>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Multiselect
            </span>
            <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                multiple>
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
                <option>Option 4</option>
                <option>Option 5</option>
            </select>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Message</span>
            <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Enter some long form content."></textarea>
        </label>

        <div class="flex mt-6 text-sm">
            <label class="flex items-center dark:text-gray-400">
                <input type="checkbox"
                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">
                    I agree to the
                    <span class="underline">privacy policy</span>
                </span>
            </label>
        </div>
    </div>

    <!-- Validation inputs -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Validation
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <!-- Invalid input -->
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Invalid input
            </span>
            <input
                class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                placeholder="Jane Doe" />
            <span class="text-xs text-red-600 dark:text-red-400">
                Your password is too short.
            </span>
        </label>

        <!-- Valid input -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Valid input
            </span>
            <input
                class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input"
                placeholder="Jane Doe" />
            <span class="text-xs text-green-600 dark:text-green-400">
                Your password is strong.
            </span>
        </label>

        <!-- Helper text -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Helper text
            </span>
            <input
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe" />
            <span class="text-xs text-gray-600 dark:text-gray-400">
                Your password must be at least 6 characters long.
            </span>
        </label>
    </div>

    <!-- Inputs with icons -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Icons
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Icon left</span>
            <!-- focus-within sets the color for the icon when input is focused -->
            <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                <input
                    class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe" />
                <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Icon right</span>
            <!-- focus-within sets the color for the icon when input is focused -->
            <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                <input
                    class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe" />
                <div class="absolute inset-y-0 right-0 flex items-center mr-3 pointer-events-none">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </label>
    </div>

    <!-- Inputs with buttons -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Buttons
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Button left
            </span>
            <div class="relative">
                <input
                    class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe" />
                <button
                    class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    Click
                </button>
            </div>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Button right
            </span>
            <div class="relative text-gray-500 focus-within:text-purple-600">
                <input
                    class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe" />
                <button
                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Click
                </button>
            </div>
        </label>
    </div>


    <!-- Button sizes -->
    <h4 class="mb-4 mt-7 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Sizes
    </h4>
    <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
        <!-- Divs are used just to display the examples.  only the button. -->
        <div>
            <button
                class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Larger button
            </button>
        </div>

        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <button
                class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Large button
            </button>
        </div>

        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Regular
            </button>
        </div>

        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <!-- For disabled buttons ADD these classes:
                              opacity-50 cursor-not-allowed

                              And REMOVE these classes:
                              active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple
                            -->
            <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg opacity-50 cursor-not-allowed focus:outline-none">
                Disabled
            </button>
        </div>

        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <button
                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Small
            </button>
        </div>
    </div>
    <p class="mb-8 text-gray-700 dark:text-gray-400">
        Apply
        <code>w-full</code>
        to any button to create a block level button.
    </p>

    <!-- Buttons with icons -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Icons
    </h4>
    <div class="flex flex-col flex-wrap mb-8 space-y-4 md:flex-row md:items-end md:space-x-4">
        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <span>Icon right</span>
                <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                    <path
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                    <path
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
                <span>Icon left</span>
            </button>
        </div>

        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <button
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                aria-label="Like">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <button
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                aria-label="Edit">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Table with actions
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Client</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Hans Burger</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        10x Developer
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            $ 863.45
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Approved
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Jolina Angelie</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        Unemployed
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            $ 369.95
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                Pending
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Sarah Curry</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        Designer
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            $ 86.00
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Denied
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <br><br><br>
@endsection
