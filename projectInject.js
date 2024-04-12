import {project_1,project_2,project_3} from "./ProjectData/project.js";
console.log(project_1)
// Function to get URL parameter by name
function getUrlParameter(name) {
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(window.location.href);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// Read the 'p' parameter from the URL
var projectId = getUrlParameter('p');

// Map project IDs to project names
var projectNames = {
    '1': project_1,
    '2': project_2,
    '3': project_3
};

// Set the project name in the h1 element
var projectNameElement = document.getElementById('projectName');
if (projectId && projectNames[projectId]) {
    document.getElementById('project-name').textContent=projectNames[projectId].project_name
    document.getElementById('project-description').textContent=projectNames[projectId].project_description
    document.getElementById('reviewer_name').textContent=projectNames[projectId].reviewer_name
    document.getElementById('review').textContent=projectNames[projectId].review
    document.getElementById('review_contact').textContent=projectNames[projectId].review_contact
    project_1.project_images.forEach((imageData) => {
        const image = document.createElement("img");
        image.src = imageData.image_link;
        image.setAttribute("height", "200");
        image.setAttribute("width", "200");
        image.classList.add("border-2", "border-gray-500");
      
        // Append the image to the "project-gallery" element
        document.getElementById('project-gallery').appendChild(image);
      });
} else {
    window.location.href="./index.php"
}
