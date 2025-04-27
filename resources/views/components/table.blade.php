<head>

    <style>
        /* Custom scrollbar for webkit browsers */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body class="bg-slate-50 dark:bg-slate-900 p-6 mx-auto">
    <!-- Table Component -->
    <div class=" mx-auto">
        <!-- Table Card -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm">
            <!-- Table Header -->
            <div class="p-4 border-b border-slate-200 dark:border-slate-700">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <!-- Search -->
                    <div class="relative flex-1 max-w-md">
                        <input type="search" id="tableSearch" wire:model='search_kw'
                            class="w-full px-4 py-2 pl-10 pr-4 border border-slate-200 dark:border-slate-700 rounded-lg bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            placeholder="Search...">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    @if (isset($containSelect))
                        <div class="relative flex-1 max-w-md">
                            @foreach ($selecteArrs as $selectArr)
                                <select wire:model='{{ $selectArr['key'] }}' name="" id=""
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg
                                focus:ring-2 focus:ring-teal-500 dark:focus:ring-teal-400 focus:border-transparent
                                bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400">
                                    <option>

                                        All
                                    </option>
                                    @foreach ($selectArr['values'] as $selectValue)
                                        <option value="{{ $selectValue }}">
                                            {{ $selectValue }}
                                        </option>
                                    @endforeach

                                </select>
                            @endforeach
                        </div>
                    @endif

                    <!-- Buttons -->
                    <div class="flex items-center gap-2">
                        <button wire:click='filter'
                            class="px-4 py-2 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-600">
                            <i class="fas fa-filter mr-2"></i> Filter
                        </button>
                        <a href="{{ route($details) }}"
                            class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                            <i class="fas fa-plus mr-2"></i> Add New
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full" id="dataTable">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-700/50 border-b border-slate-200 dark:border-slate-700">
                            {{-- <th class="w-12 p-4">
                                <input type="checkbox"
                                    class="w-4 h-4 text-teal-500 border-slate-300 rounded focus:ring-teal-500"
                                    id="selectAll">
                            </th> --}}
                            @foreach ($columns as $column)
                                <th class="text-sm font-semibold text-slate-900 dark:text-white">

                                    {{ capitalize_and_remove_underscore($column) }}
                                </th>
                            @endforeach

                            <th class="p-4 text-left">
                                <span class="text-sm font-semibold text-slate-900 dark:text-white">
                                    Actions
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Table Row Template -->


                        @foreach ($values as $value)
                            <tr
                                class="border-b border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/25">
                                {{-- <td class="p-4">
                              <input type="checkbox"
                                  class="w-4 h-4 text-teal-500 border-slate-300 rounded focus:ring-teal-500 row-checkbox">
                          </td> --}}

                                @foreach ($columns as $column)
                                    @if ($column == 'image')
                                        <td class="p-4  text-center">
                                            <img src="{{ $value->image }}" alt="{name}"
                                                class="w-16 h-16 rounded-lg object-cover">
                                        </td>
                                    @else
                                        <td class="p-4  text-center">
                                            <div class="font-medium text-slate-900 dark:text-white">

                                                {{ $value->$column }}
                                            </div>
                                        </td>
                                    @endif
                                @endforeach


                                <td class="p-4">
                                    <div class="flex items-center gap-2">
                                        <a class="p-2 text-blue-500 hover:text-blue-600 focus:outline-none"
                                            href="{{ route($details, $value->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="p-2 text-red-500 hover:text-red-600 focus:outline-none"
                                            wire:click="delete({{ $value->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach





                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <!-- Pagination Info -->
                    <div class="text-sm text-slate-500 dark:text-slate-400">
                        Showing {{ $values->firstItem() }} to {{ $values->lastItem() }} of {{ $values->total() }}
                        items
                    </div>

                    <!-- Pagination Controls -->
                    <div class="flex items-center gap-2">
                        <!-- Previous Button -->
                        @if ($values->onFirstPage())
                            <button
                                class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-500 dark:text-slate-400 opacity-50 cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $values->previousPageUrl() }}"
                                class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        <!-- Pagination Numbers -->
                        <div class="flex items-center gap-1">
                            @foreach ($values->links()->elements as $element)
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <a href="{{ $url }}"
                                            class="px-3 py-1 rounded-lg {{ $page == $values->currentPage() ? 'bg-teal-500 text-white' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700' }}">
                                            {{ $page }}
                                        </a>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                        <!-- Next Button -->
                        @if ($values->hasMorePages())
                            <a href="{{ $values->nextPageUrl() }}"
                                class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button
                                class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-500 dark:text-slate-400 opacity-50 cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script></script>
</body>
