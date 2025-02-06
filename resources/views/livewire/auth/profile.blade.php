<div class="page-rwapper">
    <form class="card max-w-lg mx-auto" wire:submit='update'>
        <div class="card-body">
            <div class="card-title">Modifier le profile</div>
            <div class="py-4 space-y-4">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nom complet</span>
                    </div>
                    <input type="text" placeholder="Nom complet" @class([
                        'input input-bordered', 
                        'input-error' => $errors->first('name')]) wire:model='name' />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Adresse mail</span>
                    </div>
                    <input type="email" placeholder="Adresse mail" @class([
                        'input input-bordered', 
                        'input-error' => $errors->first('email')]) wire:model='email' autocomplete='email' />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Mot de passe</span>
                    </div>
                    <input type="password" placeholder="Entrer le nouveau mot de passe" @class([
                        'input input-bordered', 
                        'input-error' => $errors->first('password')]) wire:model='password' />
                </label>
            </div>
            <div class="card-actions">
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Sauvegarder</span>
                </button>
            </div>
        </div>
    </form>
</div>