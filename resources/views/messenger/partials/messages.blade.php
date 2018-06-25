<tr class="message-unread">
    <td class="message-from">

    <a href="#" class="message-from-name">{{ $message->user->name }}</a>
        <br>
        <span class="date">Posté {{ $message->created_at->diffForHumans() }}</span>
    </td>
    <td class="message-description">
        <br>
        <div class="message-excerpt"><?= $message->body; ?></div>
    </td>
</tr>