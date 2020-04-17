# Add languages
INSERT INTO Language (shortcode, name) VALUES ("en", "English");
INSERT INTO Language (shortcode, name) VALUES ("fr", "Français");

# Add departments
INSERT INTO Department (language_id, name) VALUES (1, "Psychology");
INSERT INTO Department (id, language_id, name) VALUES (1, 2, "Psychologie");
INSERT INTO Department (language_id, name) VALUES (1, "Sociology");
INSERT INTO Department (id, language_id, name) VALUES (2, 2, "Sociologie");
INSERT INTO Department (language_id, name) VALUES (1, "Kinesiology");
INSERT INTO Department (id, language_id, name) VALUES (3, 2, "Kinésiologie");
INSERT INTO Department (language_id, name) VALUES (1, "Biology");
INSERT INTO Department (id, language_id, name) VALUES (4, 2, "Biologie");
INSERT INTO Department (language_id, name) VALUES (1, "Computer Science");