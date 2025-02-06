<div class="page-rwapper">
    <div class="card card-divider max-w-4xl mx-auto">

        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">Exporter les données de vente</h3>
    
            <p>Pour exporter les données de ventes ou obtenir un récapitulatif des données de ventes par mois, 
                veuillez d'abord sélectionner le mois puis cliquez sur "Exporter les données".</p>
    
        </div>
        <div class="card-body py-4">
    
            <form class="card-actions justify-between" wire:submit="export">
                <input type="month" @class([
                    'input input-bordered',
                    'input-error' => $errors->first('intervale'),
                ]) wire:model="intervale">
                <button class="btn btn-primary">
                    <x-tabler-upload />
                    <span>Exporter les données</span>
                </button>
    
            </form>
    
        </div>
    
    </div>
</div>

