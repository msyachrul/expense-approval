<x-app>
    <x-slot name="content">
        <div class="content-wrapper">
            <x-content-header title="Detail" :urls="['Expenses' => route('expenses.index'), 'Detail' => route('expenses.show', $expense->id)]" />

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-primary">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong>Recipient</strong>
                                        <div class="text-muted">{{ $expense->recipient }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Amount</strong>
                                        <div class="text-muted">{{ $expense->amount_with_separator }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Description</strong>
                                        <div class="text-muted">{{ $expense->description ?? '-' }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Created At</strong>
                                        <div class="text-muted">{{ $expense->created_at }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Last Updated</strong>
                                        <div class="text-muted">{{ $expense->updated_at }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </x-slot>
</x-app>
