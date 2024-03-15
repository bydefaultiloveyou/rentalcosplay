const dropArea = document.getElementById("drop-area");
const inputFile = document.getElementById("input-file");
const closeButton = document.querySelectorAll("#remove");
const imageContainer = document.getElementById("image-show-container");

let images = 0;

dropArea.addEventListener("dragover", (e) => e.preventDefault());

dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    const files = e.dataTransfer.files;
    uploadImage(files);
});
const uploadImage = (files) => {
    if (images >= 4) return alert("Max Image 4");
    inputFile.parentNode.appendChild(createElementInput(files));
    showImage(files[0]);
    images++;
};

const showImage = (file) => {
    const image = URL.createObjectURL(file);
    imageContainer.innerHTML += cardImage(image, file.name);
};

const cardImage = (image, filename) => {
    return `<div class="relative overflow-hidden rounded-lg -mt-1" id="img-${filename}">
                <div class="flex justify-between absolute px-3 py-2 w-full h-32 bg-gradient-to-b from-black/80 to-transparent">
                    <p class="text-white/90 shadow-sm" id="remove-image">${filename}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" onclick="removeImage('${filename}')" width="28" height="28" class="bg-white/5 rounded-full opacity-90" fill="white" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </div>
                <img src="${image}" class="w-full h-60 bg-cover rounded-lg border border-gray-200 bg-gray-800 object-contain bg-center" />
            </div>`;
};

const createElementInput = (files) => {
    const input = document.createElement("input");
    input.name = "images[]";
    input.id = "input-" + files[0].name;
    input.className = "hidden";
    input.type = "file";
    input.multiple = true;
    input.files = files;

    return input;
};

const removeImage = (filename) => {
    document.getElementById(`img-${filename}`).remove();
    document.getElementById(`input-${filename}`).remove();
    images--;
};

inputFile.addEventListener("change", () => {
    uploadImage(inputFile.files);
});
