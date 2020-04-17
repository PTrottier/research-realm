# Add languages
INSERT INTO Language (shortcode, name) VALUES ("en", "English");
INSERT INTO Language (shortcode, name) VALUES ("fr", "Français");

# Add departments
INSERT INTO Department (language_id, name) VALUES (1, "Mathematics and Computer Science");
INSERT INTO Department (id, language_id, name) VALUES (1, 2, "Informatique");
INSERT INTO Department (language_id, name) VALUES (1, "Biology");
INSERT INTO Department (id, language_id, name) VALUES (2, 2, "Biologie");

# Add project
INSERT INTO Project (language_id, title, researcher, department_id, call_to_action) VALUES (1, "Hello World", "Patrick", 1, "Welcome");
INSERT INTO Project (language_id, title, researcher, department_id, call_to_action) VALUES (2, "Bonjour", "Patrick", 1, "Bien");
INSERT INTO Project (language_id, title, researcher, department_id, call_to_action) VALUES (2, "Bonjour", "Alyssa", 2, "Bien");

