@props(['arr' => []])
<div class="border-b border-slate-200 p-5">
	<div class="flex flex-col gap-4 xl:flex-row xl:items-center xl:justify-between">
		<div class="relative w-full xl:max-w-md">
			<svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-width="1.8" d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"/>
            </svg>
            <form>
            <input name="search" type="text" placeholder="Search {{$arr['searchname']}}..." class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-slate-900 focus:ring-4 focus:ring-slate-900/5"
                                />

                            </div>


                            <!-- Filters -->
                            <div class="flex flex-wrap gap-3">
                            	@if(!empty($arr['categories']))
                                <select name="categories"
                                    class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-medium text-slate-700 outline-none focus:border-slate-900">
                                    <option>All Categories</option>
                                    @foreach($arr['categories'] as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    	{{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @endif

                                @if(!empty($arr['brands']))
                                <select name="brands"
                                    class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-medium text-slate-700 outline-none focus:border-slate-900">
                                    <option>All Brands</option>
                                    @foreach($arr['brands'] as $brand)
                                    <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                            			{{ $brand->name }}
                        			</option>
                        			@endforeach
                                 </select>
                                @endif


                                @if(is_array($arr['status']))
                                <select name="status" class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-medium text-slate-700 outline-none focus:border-slate-900">
                                	<option value="">All Status</option>
                                	@foreach($arr['status'] as $status)
                                    	<option value="{{$status}}">{{$status}}</option>
                                    @endforeach
                                </select>
                                @endif


                                <button
                                    class="rounded-xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
                                >
                                    Export
                                </button>
                              <button type="submit" class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-semibold text-white hover:bg-slate-700">
                Filter
            </button>

        </form>
            <a href="{{url($arr['reset'])}}" class="rounded-lg border border-slate-300 px-5 py-2.5 text-center text-sm font-medium text-slate-600 hover:bg-slate-50">
                Reset
            </a>

                              

                            </div>

                        </div>

                    </div>
              