<template>
    <div class="w-full pt-[20px] pb-[40px] px-[8%]">
        <h1 class="text-center pt-[2%] mb-[60px] relative text-4xl font-bold">Nos Services</h1>
        <div class="row grid">
            <div
                class="service group hover:bg-[#303ef7] hover:text-white hover:translate-y-[-8px] text-center py-6 px-4 rounded-lg text-sm cursor-pointer bg-transparent">
                <h2 class="font-bold mb-[18px] text-[20px]">Service 1</h2>
                <p class="group-hover:text-[#ffffffc0] text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit. Ex officia nesciunt,
                    inventore non aliquam
                    impedit. Nam, amet! Neque vero modi iure, ut sed repudiandae assumenda veniam aliquid, voluptatum
                    quidem perspiciatis!</p>
            </div>
            <div
                class="service group hover:bg-[#303ef7] hover:text-white hover:translate-y-[-8px] text-center py-6 px-4 rounded-lg text-sm cursor-pointer bg-transparent">
                <h2 class="font-bold mb-[18px] text-[20px]">Service 1</h2>
                <p class="group-hover:text-[#ffffffc0] text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit. Ex officia nesciunt,
                    inventore non aliquam
                    impedit. Nam, amet! Neque vero modi iure, ut sed repudiandae assumenda veniam aliquid, voluptatum
                    quidem perspiciatis!</p>
            </div>
            <div
                class="service group hover:bg-[#303ef7] hover:text-white hover:translate-y-[-8px] text-center py-6 px-4 rounded-lg text-sm cursor-pointer bg-transparent">
                <h2 class="font-bold mb-[18px] text-[20px]">Service 1</h2>
                <p class="group-hover:text-[#ffffffc0] text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit. Ex officia nesciunt,
                    inventore non aliquam
                    impedit. Nam, amet! Neque vero modi iure, ut sed repudiandae assumenda veniam aliquid, voluptatum
                    quidem perspiciatis!</p>
            </div>
            <div
                class="service group hover:bg-[#303ef7] hover:text-white hover:translate-y-[-8px] text-center py-6 px-4 rounded-lg text-sm cursor-pointer bg-transparent">
                <h2 class="font-bold mb-[18px] text-[20px]">Service 1</h2>
                <p class="group-hover:text-[#ffffffc0] text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit. Ex officia nesciunt,
                    inventore non aliquam
                    impedit. Nam, amet! Neque vero modi iure, ut sed repudiandae assumenda veniam aliquid, voluptatum
                    quidem perspiciatis!</p>
            </div>


        </div>
    </div>
</template>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
}

h1::after {
    content: "";
    background: #303ef7;
    width: 100px;
    height: 5px;
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
}

.row {
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 30px;
}

.service {
    transition: transform 0.5s, background 0.5s ;
    border: 1px solid #303ef7;
}

</style>