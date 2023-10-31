<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import { useForm, Head, Link } from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import InputMask from "primevue/inputmask";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["funcionario"]);
const form = useForm({
    nome: props.funcionario.nome,
    email: props.funcionario.email,
    telefone: props.funcionario.telefone,
});
</script>

<template>
    <Head title="Editando funcionario" />
    <AuthenticatedLayout>
        <form
            @submit.prevent="
                form.put(route('funcionarios.update', funcionario.id))
            "
        >
            <div class="flex items-center justify-center">
                <div
                    class="flex flex-col gap-2 bg-white rounded-md shadow-sm p-4"
                >
                    <Link :href="route('funcionarios.index')">
                        <i class="pi pi-chevron-left"></i>
                    </Link>
                    <label for="nome">Nome</label>
                    <InputText id="nome" v-model="form.nome" />
                    <InputError :message="form.errors.nome" />
                    <label for="email">Email</label>
                    <InputText id="email" v-model="form.email" />
                    <InputError :message="form.errors.email" />
                    <label for="telefone">Telefone</label>
                    <InputMask
                        id="telefone"
                        v-model="form.telefone"
                        mask="(99) 99999-9999"
                    />
                    <PrimaryButton>Atualizar</PrimaryButton>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
