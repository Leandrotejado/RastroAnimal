<?php
header('Content-Type: text/css');
?>

/* Leandro Tejado */

html, body {
    margin: 0;
    padding: 0;
    height: 100%;
}

body {
    font-family: Arial, sans-serif;
    background-color: #9972b2a2;
    color: #ffffff;
}

h1 {
    color:rgb(255, 221, 1); /* Gold for h1 headers */
}

h2 {
    color:rgb(255, 38, 0); /* Tomato for h2 headers */
}

main {
    padding-bottom: 80px;
}

header {
    padding: 20px;
    background-color: #5c30fa9a;
    box-shadow: 0 2px 5px rgba(2, 0, 0, 2);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
}

nav {
    display: flex;
    align-items: center;
    gap: 15px;
}

nav a {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
    padding: 10px;
    transition: background-color 0.3s;
}

nav a:hover {
    background-color: #abc0ff5e;
    border-radius: 5px;
}

nav a.active {
    background-color: #abc0ff;
    color: #000000;
    border-radius: 5px;
}

nav .username {
    color: #ffbb00;
    font-weight: bold;
    padding: 10px;
}

.hero {
    text-align: center;
    padding: 50px 20px;
    background-color: #6c5eb2;
}

.hero h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.2em;
    margin-bottom: 30px;
}

.features {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.feature {
    background-color: #abc0ff5e;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(2, 0, 0, 2);
    width: 200px;
    text-align: center;
}

.feature .icon {
    font-size: 40px;
    display: block;
    margin-bottom: 10px;
}

.cta-button {
    display: inline-block;
    background-color: #abc0ff;
    color: #000000;
    padding: 15px 30px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    margin-top: 20px;
    transition: background-color 0.3s;
}

.cta-button:hover {
    background-color: #0492ff;
}

.about, .how-it-works {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #090909b6;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.steps {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.step {
    background-color: #abc0ff5e;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(2, 0, 2, 2);
    width: 200px;
    text-align: center;
}

.step h3 {
    margin-top: 0;
    color: #ffffff;
}

section {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #090909b6;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.centered-form {
    margin: 0 auto;
    max-width: 400px;
}

input, textarea, select, button {
    padding: 10px;
    border: 1px solid #abc0ff;
    border-radius: 5px;
    font-size: 16px;
}

textarea {
    resize: vertical;
}

button {
    background-color: #abc0ff;
    color: #000000;
    border: none;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
    background-color: #0492ff;
}

.error {
    color: red;
    text-align: center;
}

.animal-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.animal-card {
    background-color: #abc0ff5d;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(4, 0, 4, 2);
    text-align: center;
}

.animal-card img {
    max-width: 100%;
    border-radius: 10px;
    margin-bottom: 10px;
}

.animal-card a {
    color: #ffbb00;
    text-decoration: none;
    margin: 0 10px;
}

.animal-card a:hover {
    text-decoration: underline;
}

.whatsapp-icon {
    width: 20px;
    vertical-align: middle;
}

.actions {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #1b2a55;
    color: #fff;
    text-align: center;
    padding: 10px;
    z-index: 1000;
}