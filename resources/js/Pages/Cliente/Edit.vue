<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import { useForm, Head, Link } from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["cliente"]);
const form = useForm({
    nome: props.cliente.nome,
    email: props.cliente.email,
});
</script>

<template>
    <Head title="Editando cliente" />
    <AuthenticatedLayout>
        <form @submit.prevent="form.put(route('clientes.update', cliente.id))">
            <div class="flex items-center justify-center">
                <div
                    class="flex flex-col gap-2 bg-white rounded-md shadow-sm p-4"
                >
                    <Link :href="route('clientes.index')">
                        <i class="pi pi-chevron-left"></i>
                    </Link>
                    <label for="nome">Nome</label>
                    <InputText id="nome" v-model="form.nome" />
                    <InputError :message="form.errors.nome" />
                    <label for="email">Email</label>
                    <InputText id="email" v-model="form.email" />
                    <InputError :message="form.errors.email" />
                    <PrimaryButton>Atualizar</PrimaryButton>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
