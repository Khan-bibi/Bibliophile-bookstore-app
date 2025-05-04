CREATE PROCEDURE CheckUserCredentials
    @Email VARCHAR(50),
    @Password VARCHAR(255)
AS
BEGIN
    -- Enable error handling
    BEGIN TRY
        BEGIN TRANSACTION;

        -- Declare variables to store user details if found
        DECLARE @UserID INT;
        DECLARE @Role VARCHAR(7);

        -- Check if the email and password match an existing user
        SELECT @UserID = userID, @Role = role
        FROM USERS
        WHERE email = @Email AND password = @Password;

        IF @UserID IS NOT NULL
        BEGIN
            -- If the user is found, return the user ID and role
            SELECT @UserID AS UserID, @Role AS Role;
        END
        ELSE
        BEGIN
            -- If no user is found, return an appropriate message
            SELECT 'Invalid email or password' AS ErrorMessage;
        END

        COMMIT TRANSACTION;
    END TRY
    BEGIN CATCH
        -- Rollback transaction in case of an error
        ROLLBACK TRANSACTION;

        -- Return the error message
        SELECT ERROR_MESSAGE() AS ErrorMessage;
    END CATCH
END




CREATE PROCEDURE getBorrowedBooksByUser
    @user_id INT
AS
BEGIN
    SELECT b.title, bb.borrowdate, bb.duedate
    FROM BOOKS b
    JOIN BORROWEDBOOKS bb ON b.bookid = bb.bookid
    WHERE bb.userid = @user_id;
END



CREATE PROCEDURE get_user_details
    @user_id INT
AS
BEGIN
    SELECT username, email, role
    FROM USERS
    WHERE userid = @user_id;
END





CREATE PROCEDURE get_user_book_reviews
    @user_id INT
AS
BEGIN
    SELECT u.username, r.bookid, r.review, r.stars
    FROM REVIEWS r
    JOIN users u ON r.userid = u.userid
    WHERE r.userid = @user_id;
END
GO



alter PROCEDURE get_all_reviews_with_books
AS
BEGIN
    SELECT 
        r.review, 
        r.stars,
		u.userName,
        b.title AS book_title, 
        b.author AS book_author, 
        b.bookImage AS book_image
    FROM REVIEWS r
    JOIN BOOKS b ON r.bookid = b.bookID
	join [dbo].[USERS] as u on r.userid = u.userID;
END
GO



alter PROCEDURE getUserFines
    @user_id INT
AS
BEGIN
    SELECT 
        bb.borrowDate,
        bb.dueDate,
        f.fineAmount,
        b.title,
		b.author
    FROM BORROWEDBOOKS bb
    JOIN FINES f ON bb.borrowID = f.borrowID join [dbo].[BOOKS] b on bb.bookID = b.bookID
    WHERE bb.userID = @user_id;
END
GO

