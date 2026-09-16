<a href="{{ route($link) }}"
           class="group block bg-white rounded-xl shadow-sm border border-slate-100 p-3
                  hover:shadow-md hover:-translate-y-1 transition duration-200">

            <div class="flex items-center justify-between">

                <div>
                    <h3 class="text-lg font-bold text-slate-800">
                        {{$title}}
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        {{ $count ?? 0 }} {{$title}}
                    </p>
                </div>

                <div class="w-11 h-11 rounded-lg bg-blue-100 flex items-center justify-center">
                    <span class="text-blue-600 font-bold">
                        {{ strtoupper($title[0]) }}
                    </span>
                </div>

            </div>

            <p class="text-xs text-slate-400 mt-5 group-hover:text-slate-600">
                {{$subTitle}}
            </p>

        </a>
