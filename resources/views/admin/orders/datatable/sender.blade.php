<span>
    @if ($sender)
    <x-link :href="route('admin.customer.edit', $sender['id'])" :title="$sender['fullname']" />
    @else
    <x-link :href="route('admin.customer.edit', $sender['id'])" :title="$sender['fullname']" />,&nbsp;
    @endif
</span>