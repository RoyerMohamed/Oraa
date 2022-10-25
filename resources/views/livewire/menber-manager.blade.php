<div>
    <div class="projet_create-users neumorphisme">
        <div class="projet_create-users-list">
            <div class="projet_create-users-list-addMembers">
                <span>Membres</span>
                <span wire:click="showList"><i class="fas fa-plus-circle"></i></span>
            </div>
            @if (session('projet_users'))
                @php $members = session()->get('projet_users'); @endphp
                <div class="avatar_wrapper">
                    <div class="avatars">
                        @foreach ($members as $member)
                            <span class="avatar">
                                <img src="{{ Storage::url($member['image_name']) }}" alt="" srcset="">
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="projet_create-users-add {{$this->visible ? "" : "d-none"}}">
            <span>Ajouter un membre</span>
            @foreach ($format_user as $key => $user)
                @if (in_array($user, $members))
                    @php $is_present = true @endphp
                @else
                    @php $is_present = false @endphp
                @endif
                <div class="projet_create-users-add-single">
                    <div class="projet_create-users-add-single-info">
                        <img src="{{ Storage::url($user['image_name']) }}" alt="" srcset="">
                        <span>{{ $user['pseudo'] }}</span>
                    </div>
                    <div class="{{ $is_present ? 'Retirer' : 'Ajouter' }}">
                        <span wire:click=" {{ $is_present ? 'removeFromSession('.$key.')' : 'storeUserToSession('.$user['id'].' )'}}"
                            classe="">{{ $is_present ? 'Retirer' : 'Ajouter' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
