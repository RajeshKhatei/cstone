$("#contactform").validate({
								rules: {
									 Name: {
											required: true
												 },
									 Email:{
											required:true,
											email:true
												 },
									 Phone: {
											required: true	
												 },																					 
											},
										messages: {
											Name: "Enter Your Name",
											Email:"Enter a valid email Id",
											Phone:"Enter Your phone no.",											
									 }									 									
					
							 });


//------------------------------------------------------------------------------------------------

$("#careerform").validate({
								rules: {
									 Name: {
											required: true
												 },
									 Email:{
											required:true,
											email:true
												 },
									 Phone: {
											required: true	
												 },
									 Experience: {
											required: true	
									       },
									 Skills: {
											required: true	
									       },
									 Resume:{
										 required: true,
										 extension: "txt|docx|pdf"
									       },
												 
											},
										messages: {
											Name: "Enter Your Name",
											Email:"Enter a valid email Id",
											Phone:"Enter Your phone no.",
											Experience:"Enter Your Experience.",
											Skills:"Enter Your Skills.",
											Resume: {required: "Select Your Resume",  
											extension: "Allower file types are .docx / .pdf / .txt only"}
									 }
													
									 });