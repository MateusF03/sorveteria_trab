<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import ConfirmPopup from "primevue/confirmpopup";
import { useForm, Head, Link } from "@inertiajs/vue3";
import Button from "primevue/button";
import { useConfirm } from "primevue/useconfirm";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import axios from "axios";

defineProps(["fornecedores"]);

const form = useForm({
    nome: "",
    endereco: "",
});

const popup = useConfirm();
const confirm = (event, id) => {
    popup.require({
        target: event.currentTarget,
        message: "Tem certeza que deseja excluir?",
        accept: () => {
            axios
                .delete(route("fornecedores.destroy", id))
                .then((response) => {
                    console.log(response);
                    window.location.reload();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    });
};
</script>

<template>
    <Head title="Fornecedores" />
    <AuthenticatedLayout>
        <form
            @submit.prevent="
                form.post(route('fornecedores.store'), {
                    onSuccess: () => form.reset(),
                })
            "
        >
            <div
                class="flex flex-col items-center justify-center bg-white p-4 mt-2 shadow-sm rounded-md max-w-5xl mx-auto"
            >
                <div class="flex flex-row space-x-2">
                    <div class="flex flex-col gap-2">
                        <label for="nome">Nome</label>
                        <InputText id="nome" v-model="form.nome" />
                        <InputError :message="form.errors.nome" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="endereco">Endereco</label>
                        <InputText id="endereco" v-model="form.endereco" />

                        <InputError :message="form.errors.endereco" />
                    </div>
                </div>
                <PrimaryButton class="mt-4">Salvar</PrimaryButton>
            </div>
        </form>
        <ConfirmPopup></ConfirmPopup>
        <DataTable
            stripedRows
            class="mt-2 rounded-md shadow-sm max-w-5xl mx-auto"
            :value="fornecedores"
        >
            <Column field="nome" header="Nome"></Column>
            <Column field="endereco" header="Endereco"> </Column>
            <Column header="Ações">
                <template #body="slotProps">
                    <div
                        class="card flex flex-wrap gap-2 justify-content-center"
                    >
                        <Button
                            @click="confirm($event, slotProps.data.id)"
                            icon="pi pi-trash"
                            severity="danger"
                            text
                        />
                        <Link :href="route('fornecedores.edit', slotProps.data.id)">
                            <Button icon="pi pi-pencil" text />
                        </Link>
                    </div>
                </template>
            </Column>
        </DataTable>
    </AuthenticatedLayout>
</template>
