<div class="row">
    <div class="col-md-9">
        <ul class="pagination pagination-sm mt-0">
        <li class="active">
            <a href="{{ route('users.messages', Auth::user()->id ) }}">Inbox</a>
        </li>
        <li>
            <a href="{{ route('users.messages.create', Auth::user()->id ) }}">Compose</a>
        </li>
        </ul>
    </div>
    <div class="col-md-3">

        <form action="#">
            <label for="messages_search" class="sr-only">Search Messages</label>
            <div class="youplay-input">
                <input type="text" name="s" id="messages_search" placeholder="Search Messages...">
            </div>
        </form>
    </div>
</div>