<span>
    @if ($driver)
    <x-link :href="route('admin.admin.edit', $driver['id'])" :title="$driver['fullname']" />
    @endif
</span>