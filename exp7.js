// JavaScript DOM Manipulation for To-Do List

function addTask() {
    // 1. Give reference to the input box using getElementById
    var inputElement = document.getElementById("taskInput");
    var taskText = inputElement.value; // GET the typed text
    
    // Check if the input is empty
    if (taskText == "") {
        alert("Please enter a task before clicking add!");
        return; // stop execution
    }
    
    // 2. Identify where we want to add the new task (the <ul> list)
    var list = document.getElementById("taskList");
    
    // 3. Create a brand new list item (<li>) using createElement
    var newItem = document.createElement("li");
    
    // Set the initial text of our new list item
    newItem.innerHTML = taskText + " ";
    
    // 4. Create the 'Complete' button using createElement
    var completeBtn = document.createElement("button");
    completeBtn.innerHTML = "Complete";
    
    // Setup what happens when 'Complete' is clicked
    completeBtn.onclick = function() {
        // Strike a line through the text and change colour
        newItem.style.textDecoration = "line-through";
        newItem.style.color = "gray";
    };
    
    // 5. Create the 'Remove' button using createElement
    var removeBtn = document.createElement("button");
    removeBtn.innerHTML = "Remove";
    
    // Setup what happens when 'Remove' is clicked
    removeBtn.onclick = function() {
        // Use removeChild to delete 'newItem' from the 'list'
        list.removeChild(newItem);
    };
    
    // 6. Connect the pieces using appendChild
    // Put the buttons inside the new list item
    newItem.appendChild(completeBtn);
    newItem.appendChild(removeBtn);
    
    // Finally, put the entire new item into the <ul> list
    list.appendChild(newItem);
    
    // 7. Clear the input box so the user can type the next task
    inputElement.value = "";
}
