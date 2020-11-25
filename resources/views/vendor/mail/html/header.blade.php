<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://leadest.coderman.ru/img/leadest-logo.svg" class="logo" alt="leadest Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
