const socket = io("http://localhost:4000");

document.addEventListener("DOMContentLoaded", (event) => {
    const newMessage = document.getElementById("user-message").value;
    document.getElementById("user-message").value = "";
    socket.emit("messageFromClientToServer", newMessage);
    //forming TCP connection
    socket.on("messageFromServerToAllClients", (newMessage) => {
        console.log(newMessage);
        document.getElementById("messages").innerHTML +=
            "<li>" + newMessage + "</li>";
    });
});

document.getElementById("message-form").addEventListener("submit", (e) => {
    e.preventDefault();

    const newMessage = document.getElementById("user-message").value;
    document.getElementById("user-message").value = "";
    socket.emit("messageFromClientToServer", newMessage);
});
