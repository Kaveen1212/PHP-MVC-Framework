//profile image Drag and drop

const dropArea = document.querySelector(".form-drag-area");
let dropText = document.querySelector(".description");
const browseButton = document.querySelector(".form-upload");
let inputPath = document.querySelector("#profile_image");

let file;


//browse option and upload options
browseButton.onclick = () => {
      inputPath.click();
}

inputPath.addEventListener("change", function(){
      file = this.files[0];
      
      showImage();
});

dropArea.addEventListener("dragover", (event)=>{
      event.preventDefault();
      dropArea.classList.add("active");
      dropText.textContent = "Release to Upload the File";
})

dropArea.addEventListener("dragleave", ()=>{
      dropArea.classList.remove("active");
      dropText.textContent = "Drag & Drop to Upload File";
})

dropArea.addEventListener("drop", (event)=>{
      event.preventDefault();

      file = event.dataTransfer.files[0];
      let list = new DataTransfer();
      list.items.add(file);
      inputPath.files = list.files;

      showImage();
      dropArea.classList.remove("active");
})

function showImage() {
      let fileType = file.type;
  
      let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
  
      if (validExtensions.includes(fileType)) {
          let fileReader = new FileReader();
  
          fileReader.onload = () => {
              let fileURL = fileReader.result; // Use the instance here, not the class
              document.querySelector("#profile_image_placeholder").setAttribute('src', fileURL);
              
          };
  
          fileReader.readAsDataURL(file);
  
          let validate = document.querySelector(".profile-image-validation");
          validate.classList.add("active");
      } else {
          alert("This is not a valid file");
          dropArea.classList.remove("active");
      }
  }
  