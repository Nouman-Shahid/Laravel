export default function ApplicationLogo(props) {
    return (
        <dix className="flex space-x-2 items-end">
            <img
                src="https://merakiui.com/images/logo.svg"
                className="h-12 rounded-2xl"
            />
            <p className="font-poppins font-bold text-[3.2vh]">
                <span className="text-blue-700">eet</span>
                <span className="text-red-500">Up</span>
            </p>
        </dix>
    );
}
