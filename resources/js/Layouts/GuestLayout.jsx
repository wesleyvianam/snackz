import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import LogoText from '../Components/LogoText';

export default function Guest({ children }) {
    return (
        <div className="flex h-screen">
            <div className="w-1/4">
                <div>
                    <Link href="/">
                        <LogoText>Snackz</LogoText>
                    </Link>
                </div>

                <div className="w-full ">
                    {children}
                </div>
            </div>
            <div className='w-3/4 p-10'>
                <div className="bg-primary rounded-3xl min-h-full flex justify-center items-center text-white text-3xl"> 
                    IMAGE QUE O NIKOLAS VAI FAZER
                </div>
            </div>
        </div>
    );
}
