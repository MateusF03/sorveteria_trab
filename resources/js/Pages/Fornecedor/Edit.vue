<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import { useForm, Head, Link } from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["fornecedor"]);
const form = useForm({
    nome: props.fornecedor.nome,
    endereco: props.fornecedor.endereco,
});
</script>

<template>
    <Head title="Editando fornecedores" />
    <AuthenticatedLayout>
        <form @submit.prevent="form.put(route('fornecedores.update', fornecedor.id))">
            <div class="flex items-center justify-center">
                <div
                    class="flex flex-col gap-2 bg-white rounded-md shadow-sm p-4"
                >
                    <Link :href="route('fornecedores.index')">
                        <i class="pi pi-chevron-left"></i>
                    </Link>
                    <label for="nome">Nome</label>
                    <InputText id="nome" v-model="form.nome" />
                    <InputError :message="form.errors.nome" />
                    <label for="endereco">Endereco</label>
                    <InputText id="endereco" v-model="form.endereco" />
                    <InputError :message="form.errors.endereco" />
                    <PrimaryButton>Atualizar</PrimaryButton>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
