<span>
    @if ($receiver)
    <x-link :href="route('admin.customer.edit', $receiver['id'])" :title="$receiver['fullname']" />
    @else
    <x-link :href="route('admin.customer.edit', $receiver['id'])" :title="$receiver['fullname']" />,&nbsp;
    @endif
</span>