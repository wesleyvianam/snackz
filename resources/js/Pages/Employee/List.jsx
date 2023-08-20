import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import {Head, useForm, usePage} from "@inertiajs/react";
import TextInput from "@/Components/TextInput.jsx";
import InputError from "@/Components/InputError.jsx";
import SecondaryButton from "@/Components/SecondaryButton.jsx";
import DangerButton from "@/Components/DangerButton.jsx";
import Modal from "@/Components/Modal.jsx";
import {useRef, useState} from "react";

export default function List({ auth }) {
    const { employees } = usePage().props;

    const [confirmingUserCreate, setConfirmingUserCreate] = useState(false);

    const passwordInput = useRef();

    const confirmUserCreated = () => {
        setConfirmingUserCreate(true);
    };

    const createUser = (e) => {
        e.preventDefault();

        post(route('employee.store'), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
            onFinish: () => reset(),
        });
    };

    const {
        data,
        setData,
        post,
        processing,
        reset,
        errors,
        } = useForm({
            name: '',
            email: '',
            parent: auth.user.id,
            super: 0
        }
    );

    const closeModal = () => {
        setConfirmingUserCreate(false);

        reset();
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Home" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="overflow-hidden mb-5 flex items-center justify-between">
                        <div className="text-2xl text-gray-500">
                            Employees
                        </div>

                        <div onClick={() => {setConfirmingUserCreate(true)}} className="rounded border py-2 px-5">Create</div>
                    </div>

                    <ul className="border rounded-md">
                        {employees.map((name, index) => {
                            return (
                                <li className="border-b p-2" key={index}>
                                    <span>{name.name}</span>
                                </li>
                            )
                        })}
                    </ul>

                    <Modal show={confirmingUserCreate} onClose={closeModal}>
                        <form onSubmit={createUser} className="p-6">
                            <h2 className="text-lg font-medium text-gray-900">
                                New employee
                            </h2>

                            <div className="mt-6">
                                <TextInput
                                    id="name"
                                    type="text"
                                    name="name"
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                    className="mt-1 block w-3/4"
                                    isFocused
                                    placeholder="name"
                                />

                                <InputError message={errors.name} className="mt-2" />
                            </div>

                            <div className="mt-6">
                                <TextInput
                                    id="email"
                                    type="email"
                                    name="email"
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                    className="mt-1 block w-3/4"
                                    isFocused
                                    placeholder="email"
                                />

                                <InputError message={errors.email} className="mt-2" />
                            </div>

                            <div className="mt-6 flex justify-end">
                                <SecondaryButton onClick={closeModal}>Cancel</SecondaryButton>

                                <DangerButton className="ml-3" disabled={processing}>
                                    Save Account
                                </DangerButton>
                            </div>
                        </form>
                    </Modal>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
