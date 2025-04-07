<div class="py-4 px-4">

    {{-- <div class="grid md:grid-cols-2 gap-6 ">
        <div class="card card-divider h-fit">
            <div class="card-body">
                <input type="search" class="input input-bordered" placeholder="Rechercher un menu" wire:model.live='search'>
            </div>
            @foreach ($menus as $type => $menu)
                <div class="card-body">
                    <h3 class="text-xl font-bold capitalize py-2"><span class="rounded bg-primary py-2 px-2">{{ $type }}</span></h3>
                    <div class="grid grid-cols-4 gap-2">
                        @foreach ($menu as $item)
                            <button class="avatar" wire:click='addItem({{ $item->id }})'>
                                <div class="w-full rounded-lg">
                                    <img src="{{ $item->avatar }}" alt="">
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <form class="card h-fit" wire:submit='sauvegarder'>
            <div class="card-body space-y-4">
                <h5 class="card-title">Panier</h5>
                <div @class(['table-rwapper', 'border-error' => $errors->first('items')])>
                    <table class="table">
                        <thead>
                            <th>Menu</th>
                            <th>Qte</th>
                            <th>Prix</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($items ?? [] as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value['qte'] }}</td>
                                    <td>{{ number_format($value['price'], 2) }} Fc</td>
                                    <td>
                                        <button class="btn btn-xs btn-square" wire:click="removeItem('{{ $key }}')">
                                            <x-tabler-minus class="size-4" />
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <select @class(['select select-bordered', 'select-error' => $errors->first('form.customer_id')]) wire:model='form.customer_id'>
                    <option value="" disabled selected>Choisir un client</option>
                    @foreach ($customers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <textarea rows="3" @class(['textarea textarea-bordered', 'textarea-error' => $errors->first('form.description')])
                    placeholder="Entrer le detai de cette vente pour plus de spécification au client"
                    wire:model='form.description'></textarea>

                <div class="card-actions justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs">Total</div>
                        <div @class(['card-title', 'text-error' => $errors->first('items')])>{{ number_format($this->getTotPrice(), 2) }} Fc </div>
                    </div>
                    <button class="btn btn-primary">
                        <x-tabler-check class="size-5" />
                        <span>Sauvegarder</span>
                    </button>
                </div>
            </div>
        </form>
    </div> --}}

    <!-- component -->
    <div class=" mx-auto bg-white">
        <div class="flex md:flex-row flex-col-reverse shadow-lg">
            <!-- left section -->
            <div class="w-full lg:w-3/5 min-h-screen shadow-lg">
                <!-- header -->
                <div class="grid grid:md px-4 py-4 space-y-4">
                    <input type="search" class="input input-bordered" placeholder="Rechercher un menu" wire:model.live='search'>
                </div>
                <!-- end header -->
                <!-- categories -->
                {{-- <div class="mt-5 flex flex-row px-5">
                    <span
                        class="px-5 py-1 bg-yellow-500 rounded-2xl text-white text-sm mr-4"
                    >
                        Tous les menus
                    </span>
                    @foreach ($menus as $type => $menu)
                        <button class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4" value="{{ $type }}" wire:click='search'>
                            {{ $type }}
                        </button>
                    @endforeach

                </div> --}}
                <!-- end categories -->
                <!-- products -->
                <div class="grid md:grid-cols-3 gap-4 px-5 mt-5 overflow-y-auto h-3/4">
                    @foreach ($menus as $type => $menu)
                        @foreach ($menu as $item)
                            <button class="px-3 py-3 flex flex-row border border-gray-200 rounded-md h-32 justify-between" wire:click='addItem({{ $item->id }})'>
                                <div class="flex flex-col items-stretch">
                                    <div class="font-bold text-gray-800">{{ $item->name }}</div>
                                    <span class="font-light text-sm text-gray-400">{{ $item->type }}</span>
                                    <span class="self-end font-bold text-lg text-yellow-500 px-2 mt-4">{{ $item->price }}Fc</span>
                                </div>
                                <div class="">
                                    <img src="{{ $item->avatar }}" class=" h-24 object-cover rounded-md"  alt="{{ $item->name }}">
                                </div>
                            </button>
                        @endforeach
                    @endforeach

                </div>
                <!-- end products -->
            </div>
            <!-- end left section -->
            <!-- right section -->
            <form class="w-full lg:w-2/5" wire:submit='sauvegarder'>
                <!-- header -->
                <div class="flex flex-row items-center justify-between px-5 mt-5">
                <div class="font-bold text-xl">Panier</div>
                <div class="font-semibold">
                    <button class="px-4 py-2 rounded-md bg-red-100 text-red-500" wire:click='removePanier'>Supprimer tous</button>
                </div>
                </div>
                <!-- end header -->
                <!-- order list -->
                <div class="px-5 py-4 mt-5 overflow-y-auto h-64 " >
                    @foreach ($items ?? [] as $key => $value)
                        <div class="flex flex-row justify-between mb-4">
                            <div class="flex flex-row items-center w-2/6">
                                <span class="ml-4 font-semibold text-sm">{{ $key }}</span>
                            </div>
                            <div class="w-24 flex justify-between text-sm">
                                <button class="px-3 py-1 rounded-md bg-gray-300 " wire:click="removeItem('{{ $key }}')">-</button>
                                <span class="font-semibold mx-4 text-sm mt-1">{{ $value['qte'] }}</span>
                                <button class="px-3 py-1 rounded-md bg-gray-300 " wire:click="addItemQte('{{ $key }}')">+</button>
                            </div>
                            <div class="font-semibold text-sm w-16 text-center">
                                {{ number_format($value['price'], 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- end order list -->
                <!-- totalItems -->
                <div class="px-5 mt-5">
                    <div class="py-4 rounded-md shadow-lg space-y-4">
                        <div class="grid grid:md px-4 space-y-4">
                            <select @class(['select select-bordered', 'select-error' => $errors->first('form.customer_id')]) wire:model='form.customer_id'>
                                <option value="" disabled selected>Choisir un client</option>
                                @foreach ($customers as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>

                            <textarea rows="2" @class(['textarea textarea-bordered', 'textarea-error' => $errors->first('form.description')])
                                placeholder="Entrer le detali de cette vente pour plus de spécification au client"
                                wire:model='form.description'></textarea>
                        </div>
                        <div class="border-t-2 mt-3 py-2 px-4 flex items-center justify-between">
                        <span class="font-semibold text-2xl">Total</span>
                        <span class="font-bold text-2xl">{{ number_format($this->getTotPrice(), 2) }} Fc</span>
                        </div>
                    </div>
                </div>
                <!-- end total -->

                <!-- button pay-->
                <div class="px-5 mt-5">
                    <button class="px-4 py-4 rounded-md shadow-lg text-center bg-yellow-500 text-white font-semibold">
                        Sauvegarder
                    </button>
                </div>
                <!-- end button pay -->
            </form>
            <!-- end right section -->
        </div>
    </div>

</div>
