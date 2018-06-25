<div class="row">
    <div class="col-md-9">
        <ul class="pagination pagination-sm mt-0">
        <li 
        <?php if (strpos(url()->current(), 'create') == false and strpos(url()->current(), 'show') == false) {
                  echo 'class="active"';
              }?>>
            <a href="{{ route('users.messages', Auth::user()->id ) }}">Boite de réception</a>
        </li>
        <li 
        <?php if (strpos(url()->current(), 'create') !== false or strpos(url()->current(), 'show') !== false) {
                  echo 'class="active"';
              }?>>
            <a href="{{ route('users.messages.create', Auth::user()->id ) }}">Écrire</a>
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