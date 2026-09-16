@props(['arr' => []])
<div class="overflow-x-auto">
    <table class="w-full min-w-[900px] text-left">
        <thead class="bg-gray-50">
            <tr>
                @if(!empty($arr['columnArr']))
                    @foreach($arr['columnArr'] as $key)
                        <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">{{$key}}</th>
                    @endforeach
                @endif
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-100">
            {{$slot}}
        </tbody>
    </table>
</div>